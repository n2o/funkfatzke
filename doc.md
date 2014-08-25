# Dokumentation

## Artikel

Artikel werden in der Tabelle `Articles` abgespeichert.

Der Rabatt pro Tag wird aktuell in `plugins/articlelist/deploy/render.php` gespeichert.

## SQL Query

```
$db = DB::get();
$res = $db->query('SELECT * FROM `Users`');
print_r($res->fetchAll(PDO::FETCH_ASSOC));
```



