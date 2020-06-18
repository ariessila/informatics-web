

CKEDITOR.plugins.add('imagemanager',
{
    init: function (editor) {
        var pluginName = 'imagemanager';
        editor.ui.addButton('Imagemanager',
            {
                label: 'Image Manager',
                command: 'OpenWindow',
                icon: CKEDITOR.plugins.getPath('imagemanager') + 'mybuttonicon.gif'
            });
        var cmd = editor.addCommand('OpenWindow', { exec: showMyDialog });
    }
});
function showMyDialog(e) {
    // console.log(e.name);
    $('.browse-image').trigger('click');
    $('#popImageManager').attr('data-image-id',e.name);
    $('#popImageManager').attr('data-is-ckeditor','1');
   // window.open('/Default.aspx', 'MyWindow', 'width=800,height=700,scrollbars=no,scrolling=no,location=no,toolbar=no');
}
// Place any jQuery/helper plugins in here.
