<!doctype html>
<html>
<head>
</head>
<body>
    <canvas id="heatmap" width=1200 height=700 style="border: 1px solid #000000;"></canvas>

    <script>
        var c = document.getElementById("heatmap");
        var ctx = c.getContext("2d");

        var url = "AnalyticalTracking.php";
        var method = "POST";
        var postData = null;

        var request = new XMLHttpRequest();
        request.onload = function () {
            var status = request.status;
            var data = request.responseText;

            var arrData = JSON.parse(data).data;

            for(var i=0; arrData.length; i++) {


                var json = arrData[i];
                var x = json["clientX"];
                var y = json["clientY"];

                if (x != null) {
                    if (i % 2 == 0) {
                        ctx.moveTo(x, y);
                    } else {
                        ctx.lineTo(x, y);
                        ctx.stroke();
                    }
                }
            }
        }

        request.open(method, url, false);
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

        request.send(postData);

    </script>
</body>
</html>

