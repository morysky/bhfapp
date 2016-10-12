<!doctype html>
<html>
    <head>
        <script src="http://cdn.bootcss.com/angular.js/1.5.0/angular.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body ng-app="myApp">

        <div class='container'>
            <div class='row' ng-controller='searchController'>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <br>
                    <div class="input-group input-group">
                        <span class="input-group-addon" id="sizing-addon1">输入框</span>
                        <input type="text" class="form-control" aria-describedby="sizing-addon1" ng-model="textbox">
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary btn-lg btn-block" ng-click="ajax_query(textbox);">发起Ajax</button>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>

            <div class='row' ng-controller='tableController'>
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>Title1</th>
                                        <th>Title2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in pagedata">
                                        <td>{{item.data1}}</td>
                                        <td>{{item.data2}}</td>
                                        <td><button type="button" class="btn btn-primary btn-sm" ng-click="query_by_table_item(item)">Query by table item</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>


    </body>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script type="text/javascript">

var ajax_test_url = "user/login";
var app = angular.module('myApp', []);
app.controller('tableController', function($scope, $http) {
    $scope.pagedata = angular.copy(pagedata);
    $scope.query_by_table_item = function(item) {
        console.log(item);
        // open new window
        window.open("http://www.baidu.com?"+"param="+item.data1);
    }
});

app.controller('searchController', function($scope, $http) {
    $scope.pagedata = angular.copy(pagedata);
    $scope.ajax_query = function (textbox) {
        var post_param = new Object();
        post_param.param = textbox;
        $http.post(ajax_test_url, post_param).success(function (data, status, headers, config) {
            if(data.errno == 0) {
                alert("恭喜，成功了!");
                // location.reload();
            } else {
                alert(data.errmsg);
            }
        });
    }
});

app.config(function($httpProvider) {
    $httpProvider.defaults.transformRequest = function(obj){
        var str = [];
        for(var p in obj){
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
        return str.join("&");
    }

    $httpProvider.defaults.headers.post = {
        'Content-Type': 'application/x-www-form-urlencoded'
    }
});
    </script>

</html>
