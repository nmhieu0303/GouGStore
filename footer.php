          
        </div>
    </div>
    <script>
        function loadFile(event){
            var imgInput = document.getElementById("img-preview");
            imgInput.src =URL.createObjectURL(event.target.files[0]);
        }
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
                 $('.js-example-basic-single').select2();
        }); 
</script>
        <script src="/assets/js/main.js"></script>
</body>

</htm>