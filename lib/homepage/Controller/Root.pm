package homepage::Controller::Root;
use Moose;
use namespace::autoclean;
use Data::Dumper;

BEGIN { extends 'Catalyst::Controller' }

#
# Sets the actions in this controller to be registered with no prefix
# so they function identically to actions created in MyApp.pm
#
__PACKAGE__->config(namespace => '');

=encoding utf-8

=head1 NAME

homepage::Controller::Root - Root Controller for homepage

=head1 DESCRIPTION

[enter your description here]

=head1 METHODS

=head2 index

The root page (/)

=cut

sub index :Path :Args(0) {
    my ( $self, $c ) = @_;

    my $post = $c->request->body_parameters;
    my $req = $c->request->query_parameters;
    my $sim = '';

    if(length $post->{'word1'} > 0 && length $post->{'word2'} > 0)
    {
    	my $uri = $c->path_to('/root/static/NLP/build/exec');
    	my $word1 = lc $post->{'word1'};
    	my $word2 = lc $post->{'word2'};

    	if( $word1 =~ m/[^a-z]/ || $word2 =~ m/[^a-z]/ )
    	{
    		$sim = "Please enter no punctuation.";
    	}
    	else
	{
    		$sim = `$uri "$word1" "$word2"`;
    	}
    }

    if(!exists $req->{'p'})
    {
    	$c->stash(template => 'home.tt',
    			  page => 'home',
    			  sim => $sim);
    }
    else
    {
    	$c->stash(template => 'home.tt',
    			  page => $req->{'p'},
    			  sim => $sim);
    }
}

=head2 default

Standard 404 error page

=cut

sub default :Path {
    my ( $self, $c ) = @_;
    $c->stash(template => 'home.tt',
    		  page => 'fourohfour');
}

=head2 end

Attempt to render a view, if needed.

=cut

sub end : ActionClass('RenderView') {}

=head1 AUTHOR

Wes Caldwell,,,

=head1 LICENSE

This library is free software. You can redistribute it and/or modify
it under the same terms as Perl itself.

=cut

__PACKAGE__->meta->make_immutable;

1;
