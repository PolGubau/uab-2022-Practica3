<?php



// function that generates a random number from 25 to 100
function generateRandomNumber()
{
    return rand(25, 100);
}

function generateTelephone()
{
    $telephone = '';
    for ($i = 0; $i < 9; $i++) {
        $telephone .= rand(0, 9);
    }
    return  $telephone;
}

function generateDate()
{
    $date = '';
    $date .= rand(1, 28) . ' / ';
    $date .= rand(1, 12) . ' / ';
    $date .= rand(1950, 2018);
    return $date;
}

function generateCountry()
{
    $countries = [
        'Albania',
        'Andorra',
        'Armenia',
        'Austria',
        'Azerbaijan',
        'Belarus',
        'Belgium',
        'Bosnia and Herzegovina',
        'Bulgaria',
        'Croatia',
        'Cyprus',
        'Czech Republic',
        'Denmark',
        'Estonia',
        'Finland',
        'France',
        'Georgia',
        'Germany',
        'Greece',
        'Hungary',
        'Iceland',
        'Ireland',
        'Italy',
        'Kazakhstan',
        'Kosovo',
        'Latvia',
        'Liechtenstein',
        'Lithuania',
        'Luxembourg',
        'Macedonia',
        'Malta',
        'Moldova',
        'Monaco',
        'Montenegro',
        'Netherlands',
        'Norway',
        'Poland',
        'Portugal',
        'Romania',
        'Russia',
        'San Marino',
        'Serbia',
        'Slovakia',
        'Slovenia',
        'Spain',
        'Sweden',
        'Switzerland',
        'Turkey',
        'Ukraine',
        'United Kingdom',
        'Vatican City'
    ];
    $index = rand(0, count($countries) - 1);
    return $countries[$index];
}
