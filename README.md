# Ndate (Nepali date converter)

A PHP library for `AD to BS` and `BS to AD`

## Install
Run the following command from you terminal:

`composer require kmlpandey77/ndate`

## Usage

### AD to BS
```php
use Kmlpandey77\Ndate\Ndate;

# Example 01

$date_to_bs = Ndate::to_bs("2023-11-08");

echo $date_to_bs // OUTPUT: 2080-07-22 
echo $date_to_bs->lang(Ndate::NP) // OUTPUT: २०८०-०७-२२


# Example 02

$date_to_bs = Ndate::to_bs("2023-11-08", 'd/m/Y');

echo $date_to_bs // OUTPUT: 22/07/2080
echo $date_to_bs->format('D, d M, Y') // Wednesday, 22 Kartik, 2080
echo $date_to_bs->format('D, d M, Y')->lang(Ndate::NP) // OUTPUT: बुधवार, २२ कार्तिक, २०८०
```

### BS to AD
COMING SOON

