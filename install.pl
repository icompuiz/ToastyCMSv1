#!/usr/bin/perl

################################################
# Installation script for ToastyCMS database 
#
# Author Isioma Nnodum isioma.nnodum@gmail.com
################################################

use strict;
use warnings;

sub printPrompt {

	my $input = "";
	my $default = defined $_[0];	
	
	if ( $default ) {
	
		$default = $_[0];
		
		printf("[%s]> ", $default);	
	} else {
		printf("> ");	
	
	}
	
	$input = <STDIN>;
	chomp($input);
	
	if ( $default ) {
	
		if ( $input eq "" ) {
			$input = $default;
		}
		
	}

	print "\n";
	
	return $input;

}

my %database;

print "Welcome to the ToastyCMS install script\n";
# --------------------------------------------

PERSISTENT:
print "Persistent Connection? (y/n)\n";
my $input = printPrompt("n");
if ( $input eq "y" or $input eq "n") { 
	$database{'persistent'} = $input eq "n" ? 'false' : 'true';
} else {
	print "Invalid input\n";
	goto PERSISTENT;
}

# --------------------------------------------

print "Database host:\n";
$input = printPrompt("localhost");
$database{'host'} = $input;

# --------------------------------------------

PORT:
print "Port?\n";
$input = printPrompt("n");
if ( $input =~ /(^n$)|(^\d+$)/ ) {
	$database{'port'} = $input;
} else {
	print "Invalid hostname\n";
	goto PORT;
}

# --------------------------------------------

print "User:\n";
$input = printPrompt("root");
$database{'login'} = $input;

# --------------------------------------------

print "Password:\n";
$input = printPrompt();
$database{'password'} = $input;

# --------------------------------------------

print "Database Name:\n";
$input = printPrompt("Toasty");
$database{'database'} = $input;

# --------------------------------------------

print "Table Prefix?\n";
$input = printPrompt("n");
$database{'prefix'} = $input eq "n" ? '' : $input;

# --------------------------------------------

print "Table Encoding?\n";
$input = printPrompt("n");
$database{'encoding'} = $input eq "n" ? '' : $input;

my $format = "\t\t'%s' => '%s',\n";
my $format2 = "\t\t'%s' => %s,\n";

my $output = sprintf "\t%s\n", 'public $default = array(';
$output .= sprintf($format, 'datasource', 'Database/Mysql');
foreach my $key ( keys %database ) {

	if ( $key eq 'persistent' ) {
		$output .= sprintf($format2, $key, $database{$key});
	} else {
		$output .= sprintf($format, $key, $database{$key});
	}
}
$output .= sprintf "\t%s\n", ');';

my $default = $output;

$output = sprintf "\t%s\n", 'public $variables = array(';
$output .= sprintf($format, 'datasource', 'CsvSource');
$output .= sprintf($format, 'path', '../Config/sitevariables');
$output .= sprintf($format, 'extension',  'csv');
$output .= sprintf($format, 'readonly', 'false');
$output .= sprintf "\t%s\n", ');';

my $variables = $output;

$output = "<?php \nclass DATABASE_CONFIG { \n";
$output .= "$default\n$variables";
$output .= "}";

open(HANDLE, '>', './Config/database.php');

print HANDLE $output;

close(HANDLE);

my $host = $database{'host'};
my $database = $database{'database'};
my $user = $database{'login'};
my $pw = $database{'password'};
`./tables.sh  $user $pw $host $database`;

$variables = "./Config/sitevariables";

if ( !(-d $variables) ) {

	mkdir $variables;

} 

$output = "key,value,comment\n";
$output .= "site, null, null\n";
$output .= "owner, null, null\n";
$output .= "email, null, null\n";
$output .= "copyright, null, null";

open(VARIABLE, '>', "$variables/variables.csv");
print VARIABLE $output;
close VARIABLE;

mkdir "./tmp";
mkdir "./tmp/cache";
mkdir "./tmp/cache/models";
mkdir "./tmp/cache/persistent";
mkdir "./tmp/cache/views";
mkdir "./tmp/cache";
mkdir "./tmp/logs";
mkdir "./tmp/sessions";

my $cwd = `pwd`;

`chmod -R 777 $cwd`;