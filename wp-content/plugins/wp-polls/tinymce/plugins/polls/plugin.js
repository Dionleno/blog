(function() {
    var itens = [];
    jQuery.ajax({type: 'GET', 
        xhrFields: {
            withCredentials: true
        }, 
        url: pollsAdminL10n.admin_ajax_url, 
        data: 'action=get_pollsq_all', 
        cache: false, 
        dataType: "json",
        success: function(data) {
            //do whatever with the data you're getting back
            //with the PHP below, it's an array of the post objects
            console.log(data);
            itens = data;
        }
    });
    
	tinymce.PluginManager.add('polls', function(editor) {
		editor.addCommand('WP-Polls-Insert_Poll', function() {
			var poll_id = jQuery.trim(prompt(tinymce.translate('Enter Poll ID')));
			while(isNaN(poll_id)) {
				poll_id = jQuery.trim(prompt(tinymce.translate('Error: Poll ID must be numeric') + "\n\n" + tinymce.translate('Please enter Poll ID again')));
			}
			if (poll_id >= -1 && poll_id != null && poll_id != "") {
				editor.insertContent('[poll id="' + poll_id + '"]');
			}
		});
		editor.addButton('polls', {
			text: false,
			tooltip: tinymce.translate('Insert Poll'),
			icon: 'polls dashicons-before dashicons-chart-bar',
			onclick: function() {
                             editor.windowManager.open({
                                title: 'Todas as Enquetes',
                                body: [
                                  {
                                    type: 'listbox',
                                    name: 'myoptions',
                                    label: 'Enquetes',
                                    values: itens                                   
                                }
                                ],
                                onsubmit: function(e) {
                                  // Insert content when the window form is submitted
                                  editor.insertContent('[poll id="' + e.data.myoptions + '"]');
                                 
                                }
                              });
				//tinyMCE.activeEditor.execCommand('WP-Polls-Insert_Poll')
			}
		});
	});
})();