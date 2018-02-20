<script language="javascript">

                        $(document).ready(function()
                        {

                          $('#nik').change(function()
                          {
                            var option = $(this).find('option:selected').val();
                            $('#nama_pegawai').val(option);
                         });
                         });
                               
</script>