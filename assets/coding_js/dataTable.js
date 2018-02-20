jQuery(function($)
  {
    $('#dynamic-table')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null
      ],
      "aaSorting": [],
    });

    $('#institusi')
    .DataTable({
      bAutoWidth: false,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#kota')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null
      ],
      "aaSorting": [],
    });

    $('#major')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null
      ],
      "aaSorting": [],
    });

    $('#event_vacancy')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
        { "bSortable": false },
      ],
      "aaSorting": [],
  }); 

    $('#menu_user')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#tanggal_psychotest')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#akreditasi')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#pelamar')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null
      ],
      "aaSorting": [],
    });

    $('#user')
    .DataTable({
      bAutoWidth: true,
      "aoColumns": [
        { "bSortable": true },
        null,null,null
      ],
      "aaSorting": [],
    });
});