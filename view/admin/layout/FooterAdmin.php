</div>
</div>
<script src="../../public/assets/js/main.js"></script>

<script src="../../public/library/ckeditor/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script> -->
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor'), {
            ckfinder: {
                uploadUrl: 'fileupload.php'
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

</body>

</html>