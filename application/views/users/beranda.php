
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat bg-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <center>
              <?php echo $this->M_Web->judul_web(1); ?><br>
              <?php echo $this->M_Web->judul_web(2); ?><br>
              <?php echo $this->M_Web->judul_web(3); ?>
            </center>
          </h3>
          <!-- <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="close"></a></li>
            </ul>
          </div> -->
        </div>
        <br>
        <!-- <center> -->
         &nbsp;  Selamat Datang, <?php echo ucwords($this->session->userdata('nama')); ?>
        <!-- </center> -->
      </div>
      <!-- /basic datatable -->

      <div class="row">
        <div class="col-lg-12">

          <div class="row">
            <div class="col-lg-12">

              <div class="calendar"></div>
              <div class="box"></div>
              <br>
            </div>

            <br>
          </div>

        </div>


      </div>

    </div>
    <!-- /dashboard content -->

    <script type="text/javascript">
    $(function() {
      function onClickHandler(date, obj) {
        /**
         * @date is an array which be included dates(clicked date at first index)
         * @obj is an object which stored calendar interal data.
         * @obj.calendar is an element reference.
         * @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
               * @obj.storage.events is all events associated to this date
         */

        var $calendar = obj.calendar;
        var $box = $calendar.parent().siblings('.box').show();
        var text = 'Anda memilih tanggal ';

        if(date[0] !== null) {
          text += date[0].format('DD MMMM YYYY');
        }

        if(date[0] !== null && date[1] !== null) {
          text += ' ~ ';
        } else if(date[0] === null && date[1] == null) {
          text += 'tidak ada';
        }

        if(date[1] !== null) {
          text += date[1].format('DD MMMM YYYY');
        }

        $box.text(text);
      }

      $('.calendar').pignoseCalendar({
        lang: 'ind',
        select: onClickHandler,
        theme: 'blue' // light, dark, blue
      });
    });

    </script>
