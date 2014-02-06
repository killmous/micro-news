use strict;
use warnings;

use homepage;

my $app = homepage->apply_default_middlewares(homepage->psgi_app);
$app;

