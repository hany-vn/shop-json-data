<?php
function msg($status, $msg)
{
    $colors = [
        "success" => "linear-gradient(to right, #00b09b, #96c93d)",
        "error" => "linear-gradient(to right, #FF9900, #FF3300)",
        "warning" => "linear-gradient(to right, #FFCC33, #FF9900)"
    ];
    $color = $colors[$status];
    ?>
    <script>
        var toast = Toastify({
            text: "<?=$msg?>",
            style: {
                background: "<?=$color?>",
            },
            onClick: () => {
                toast.hideToast();
            }
        })
        toast.showToast();
    </script>
    <?php
}

function notification($module = false)
{
    if (!$module) {
        foreach ($_SESSION['notification'] ?? [] as $key => $value) {
            if (isset($_SESSION['notification'][$key])) {
                msg($_SESSION['notification'][$key]['status'], $_SESSION['notification'][$key]['message']);
                unset($_SESSION['notification'][$key]);
            }
        }
    }

    if (isset($_SESSION['notification'][$module])) {
        msg($_SESSION['notification'][$module]['status'], $_SESSION['notification'][$module]['message']);
        unset($_SESSION['notification'][$module]);
    }
}