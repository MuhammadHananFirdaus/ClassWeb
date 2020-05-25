<footer class="bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <p>Copyright © 2020.</p>
      </div>
    </div>
  </div>
</footer>



      <script src="<?=base_url()?>asset/js/jquery.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script>
              $(function() {
          let index = 1
          let slideInterval=setInterval(nextSlide,2000)

          function nextSlide(){
              $('#slide').attr('src','http://139.194.14.78:8090/XIITKJ/asset/img/kelas/'+ index + '.jpeg')
              
              index++
              if (index == 29 ) {index = 1}
          }

          $('.portofolio').on('click',function(){
              const id = $(this).data('id')
              
              $('.data-portofolio').attr('src','http://139.194.14.78:8090/XIITKJ/asset/img/kelas/'+id+'.jpeg')

          })



          $('.detailMurid').on('click',function(){
                const id=$(this).data('id')
              $.ajax({
                  url:'http://139.194.14.78:8090/XIITKJ/siswa/getDetail',
                  data: {id:id},
                  method: 'post',
                  dataType:'json',

                  success:function(data){
                        $('.gambarDetail').attr('src','http://139.194.14.78:8090/XIITKJ/asset/img/'+ data.gambar)
                        $('.nama').html(data.nama)
                        $('.ttl').html(data.ttl)
                        $('.quotes').html(data.quotes)
                  }
              })
          })
            
        })
      </script>
    </body>
    </html> 