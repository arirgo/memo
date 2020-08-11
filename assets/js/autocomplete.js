$(document).ready(function()
{
        $('#kepada').tokenfield({
                autocomplete: {
                        source: ['BLOWN FILM', 'WAREHOUSE', 'PCM', 'CPP', 'METALIZE', 'PL 2 LAMINASI', 'PL 2 PRINTING', 'PL 2 SLITTER', 'PL 1 PRINTING',
                        'PL 1 LAMINASI', 'PL 1 EXTRUSION', 'PL 1 SLITTER', 'PL 1 BAG MAKING', 'PL 3 PRINTING', 'PL 3 LAMINASI', 'PL 3 EXTRUSION', 'PL 3 SLITTER'],
                        delay: 10
                },
                showAutocompleteOnFocus: true
        });
});