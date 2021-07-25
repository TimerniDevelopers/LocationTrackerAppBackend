<script>
    function getDistrict() {
        var id = $('#division_id').val();
        console.log('ok');
        $.ajax({
            url: '/user/get-district',
            type: 'get',
            data: {
                id: id
            },
            success: function(data) {
                $('#district_id').html(data)
            }
        })
    }

    function getUpazila() {
        var id = $('#district_id').val();
        $.ajax({
            url: '/user/get-upazila',
            type: 'get',
            data: {
                id: id
            },
            success: function(data) {
                $('#upazilla_id').html(data)
            }
        })
    }

    function getNewPatient(){
        $('.appendField').show();
        $('.appendField2').hide();
    }
    function getOldPatient(){
        $('.appendField2').show();
        $('.appendField').hide();
    }
</script>
