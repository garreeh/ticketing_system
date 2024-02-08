<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal with Toastify</title>
    <!-- Include Toastify Library -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Include Bootstrap (for modal functionality) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Button to open the modal -->
<button id="openModalBtn">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Example Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Button to trigger Toastify inside the modal -->
                <button id="triggerToastBtn">Trigger Toastify</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize Toastify
    var toast = Toastify({
        text: "This is a Toastify notification!",
        duration: 3000,
        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
    });

    // Function to open modal
    document.getElementById("openModalBtn").addEventListener("click", function() {
        $("#exampleModal").modal("show");
    });

    // Function to trigger Toastify inside modal
    document.getElementById("triggerToastBtn").addEventListener("click", function() {
        // Close the modal
        $("#exampleModal").modal("hide");
        
        // Show Toastify notification
        toast.showToast();
    });
</script>

</body>
</html>
