<script>
    function getDistrict() {
        var id = document.getElementById('division_id').value;
        $.ajax({
            url: '{{ url('admin/get-district') }}',
            type: 'get',
            data: {id:id},
            success: function (data) {
                $('#district_id').html(data)
            }
        })
    }
    function getUpazila() {
        var id = document.getElementById('district_id').value;
        $.ajax({
            url: '{{ url('admin/get-upazila') }}',
            type: 'get',
            data: {id:id},
            success: function (data) {
                $('#upazilla_id').html(data)
            }
        })
    }

    // window.onload = function() {
    //     document.getElementById('option1Id').style.display = 'none';
    //     document.getElementById('option2Id').style.display = 'none';
    //     document.getElementById('option3Id').style.display = 'none';
    //     document.getElementById('option4Id').style.display = 'none';
    // }
    function inputCheck(){
        document.getElementById('option1Id').style.display = 'none';
        document.getElementById('option2Id').style.display = 'none';
        document.getElementById('option3Id').style.display = 'none';
        document.getElementById('option4Id').style.display = 'none';
    }
    function dropdownCheck(){
        document.getElementById('option1Id').style.display = 'block';
        document.getElementById('option2Id').style.display = 'block';
        document.getElementById('option3Id').style.display = 'block';
        document.getElementById('option4Id').style.display = 'block';
    }
    function mcqCheck(){
        document.getElementById('option1Id').style.display = 'block';
        document.getElementById('option2Id').style.display = 'block';
        document.getElementById('option3Id').style.display = 'block';
        document.getElementById('option4Id').style.display = 'block';
    }
</script>
