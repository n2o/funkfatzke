root = exports ? this

# remove article on click
root.removeArticle = (event) ->
    id = event.target.nextSibling.innerText if confirm("Artikel wirklich löschen?")
    console.log id
    return

# switch to different tab and edit article on click
root.editSelectedArticle = (event) ->
    root.selected = event.target.nextSibling.innerText
    $("#tabs").tabs "enable"
    $("#tabs").tabs "option", "active", "2"
    false
