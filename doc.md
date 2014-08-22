# Dokumentation

## Artikel

Artikel werden in der Tabelle `Articles` abgespeichert.

## SQL Query

```
$db = DB::get();
$res = $db->query('SELECT * FROM `Users`');
print_r($res->fetchAll(PDO::FETCH_ASSOC));
```


