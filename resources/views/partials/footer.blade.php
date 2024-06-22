  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="">Motang</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.2.0 -->
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    // Expire the feature.
      function exprieDate()
      {
        $.ajax({
            type: 'GET',
            url: "{{ route('checkExpire') }}",
            data: {
                '_token': "{{ csrf_token() }}",
            },
            success: function(data) {
                // Assuming the response has a 'models' key
                console.log('Sucessfully Expire');
            },
            error: function(data) {
                console.log('han');
            },
        });
      }
      // Call every 1 hour
      setInterval(exprieDate, 3600000);
      // 10 seconds
      // setInterval(exprieDate, 10000);
      jQuery(document).ready(function(){
    function formatDatetime(datetimeString) {
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            };
            return new Date(datetimeString).toLocaleDateString('en-US', options);
        } 
        jQuery('.timedata').each(function() {
            let data = jQuery(this).text();
            var newdata = formatDatetime(data);
            console.log(data);
            jQuery(this).text(newdata);
        });
 });
    });

</script>