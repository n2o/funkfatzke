root = exports ? this
root.selected = -1

$ ->
    $("#tabs").tabs show:
        effect: "fade"

    $("#tabs").on "tabsactivate", (event, ui) ->
        newIndex = ui.newTab.index()
        console.log "Switched to tab " + newIndex
        if newIndex is 2 and root.selected isnt -1
            console.log "Selected: " + root.selected
        return
    
return

