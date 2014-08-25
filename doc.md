# Dokumentation

## Artikel

Artikel werden in der Tabelle `Articles` abgespeichert.

Der Rabatt pro Tag wird aktuell in `plugins/articlelist/deploy/render.php` gespeichert.

Konvention: Die Artikelseiten müssen SEO freundlich so genannt werden, wie es das Framework automatisch generieren
würde, wenn man den Namen des Produkts als Titel wählt.
## SQL Query

```
$db = DB::get();
$res = $db->query('SELECT * FROM `Users`');
print_r($res->fetchAll(PDO::FETCH_ASSOC));
```



