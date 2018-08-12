    #!/usr/bin/perl
    print "<html><head><title>Directory Index</title></head><body>\n";
    foreach(sort glob( "invcsv/csvfiles/*.csv" ) )
    {
     push @lowest_priority,$_;
	print "<tr><td><a href=\"$_\">$_</a></tr></td>\n";
    }
    print "</body></html>\n";
