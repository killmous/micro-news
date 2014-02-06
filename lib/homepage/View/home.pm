package homepage::View::home;
use Moose;
use namespace::autoclean;

extends 'Catalyst::View::TT';

__PACKAGE__->config(
    TEMPLATE_EXTENSION => '.tt',
    render_die => 1,
);

=head1 NAME

homepage::View::home - TT View for homepage

=head1 DESCRIPTION

TT View for homepage.

=head1 SEE ALSO

L<homepage>

=head1 AUTHOR

Wes Caldwell,,,

=head1 LICENSE

This library is free software. You can redistribute it and/or modify
it under the same terms as Perl itself.

=cut

1;
