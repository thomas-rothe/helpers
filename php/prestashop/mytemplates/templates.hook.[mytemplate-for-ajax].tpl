<div>...</div>
<script>
    $( document ).ready(function() {
        // CSS for selected image set
        var id_product = $('#mwd-available-image-sets').data('id_product');
        cssForSelectedImageSet(id_product);

        // Ajax select image set
        $('.mwd-select-image-set').click(function(e) {
            e.preventDefault();
            var id_mwdproductimagesets = $(this).data('id_mwdproductimagesets');

            $.ajax({
                type: 'POST',
                url: '{$base_dir}../modules/mwdproductimagesets/ajax.php',
                data: {
                    method: 'mwdSelectAnImageSet',
                    id_product: id_product,
                    id_mwdproductimagesets: id_mwdproductimagesets
                },
                dataType: 'json',
                success: function (json) {
                    console.log(json);
                    cssForSelectedImageSet(id_product);
                },
                error: function () {
                    console.log('mkx ajax error select');
                }
            });
        });

        // Ajax unselect image set
        $('.mwd-unselect-image-set').click(function(e) {
            e.preventDefault();
            var id_mwdproductimagesets = $(this).data('id_mwdproductimagesets');
            console.log(id_product);
            console.log(id_mwdproductimagesets);
            $.ajax({
                type: 'POST',
                url: '{$base_dir}../modules/mwdproductimagesets/ajax.php',
                data: {
                    method: 'mwdUnselectAnImageSet',
                    id_product: id_product,
                    id_mwdproductimagesets: id_mwdproductimagesets
                },
                dataType: 'json',
                success: function (json) {
                    console.log(json);

                    $('tr td').css('background', '#f4f8fb');
                    $('tr td').css('color', 'black');
                },
                error: function () {
                    console.log('mkx ajax error unselect');
                }
            });
        });

        function cssForSelectedImageSet() {
            $.ajax({
                type: 'GET',
                url: '{$base_dir}../modules/mwdproductimagesets/ajax.php',
                data: {
                    method: 'mwdGetSelectedImageSetId',
                    id_product: id_product
                },
                dataType: 'json',
                success: function (imageSetId) {
                    $('tr td').css('background', '#f4f8fb');
                    $('tr td').css('color', 'black');
                    $('tr[data-id_mwdproductimagesets="' + imageSetId + '"] td').css('background', '#25b9d7');
                    $('tr[data-id_mwdproductimagesets="' + imageSetId + '"] td').css('color', 'white');
                },
                error: function () {
                    console.log('mkx ajax error css');
                }
            });
        }
    });
</script>
