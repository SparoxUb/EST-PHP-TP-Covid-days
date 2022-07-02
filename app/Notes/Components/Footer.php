    </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="/js/FontAwesomeAll.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    const toggleICon = document.getElementById('CollapseIconId');
    if (toggleICon.classList.contains("fa-arrow-left")) {
        toggleICon.classList.remove('fa-arrow-left');
        toggleICon.classList.add('fa-arrow-right');
    } else {
        toggleICon.classList.add('fa-arrow-left');
        toggleICon.classList.remove('fa-arrow-right');
    }
    $("#wrapper").toggleClass("toggled");
});
    </script>

    </body>

    </html>