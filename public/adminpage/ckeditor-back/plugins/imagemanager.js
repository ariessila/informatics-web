

CKEDITOR.plugins.add('imagemanager',
{
    init: function (editor) {
        var pluginName = 'imagemanager';
        editor.ui.addButton('Imagemanager',
            {
                label: 'Image Manager',
                command: 'OpenWindow',
            });
        var cmd = editor.addCommand('OpenWindow', { exec: showMyDialog });
    }
});
function showMyDialog(e) {
	alert('ok');
   // window.open('/Default.aspx', 'MyWindow', 'width=800,height=700,scrollbars=no,scrolling=no,location=no,toolbar=no');
}
// Place any jQuery/helper plugins in here.
