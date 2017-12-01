# iraiser-client
Client pour l'API iRaiser

Exemple :
```
$iraiser = new iRaiser('username', 'apikey');

$query = $iraiser
          ->contacts()
          ->withDonations()
          ->fromDate('2017-11-28')
          ->toDate('2017-12-01');

$contacts = $query->get();
```
