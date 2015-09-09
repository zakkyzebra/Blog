"use strict";

(function() {
    var app = angular.module("blog", []);

    app.controller("ManagePostsController", ["$http", "$log", "$scope", function($http, $log, $scope){
    	$scope.posts = [];
    	
    	$http.get('/posts/list').then(function(response){
            $log.info("Post list success response");
            $log.info(response);

            $scope.posts = response.data;
        }, function(response) {
            $log.error("You done messed up somehow");
            $log.debug(response);
        });

        $scope.removePost = function(index){
            var id = $scope.posts[index].id;

            $http.delete('/posts/' + id).then(function (response) {
                $log.info("Post successfully deleted");

                $scope.posts.splice(index, 1);
            }, function (response) {
                $log.error("Post failed to delete");

                $log.debug(response);
            });
        }

    }]);








    angular.module('ui.bootstrap.demo', ['ngAnimate', 'ui.bootstrap']);
    angular.module('ui.bootstrap.demo').controller('ModalDemoCtrl', function ($scope, $modal, $log) {

      $scope.items = ['item1', 'item2', 'item3'];

      $scope.animationsEnabled = true;

      $scope.open = function (size) {

        var modalInstance = $modal.open({
          animation: $scope.animationsEnabled,
          templateUrl: 'myModalContent.html',
          controller: 'ModalInstanceCtrl',
          size: size,
          resolve: {
            items: function () {
              return $scope.items;
            }
          }
        });

        modalInstance.result.then(function (selectedItem) {
          $scope.selected = selectedItem;
        }, function () {
          $log.info('Modal dismissed at: ' + new Date());
        });
      };

      $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
      };

    });

    // Please note that $modalInstance represents a modal window (instance) dependency.
    // It is not the same as the $modal service used above.

    angular.module('ui.bootstrap.demo').controller('ModalInstanceCtrl', function ($scope, $modalInstance, items) {

      $scope.items = items;
      $scope.selected = {
        item: $scope.items[0]
      };

      $scope.ok = function () {
        $modalInstance.close($scope.selected.item);
      };

      $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
      };
    });

    
})();

(function() {
    "use strict";

    // This should be the actual name of your module
    var app = angular.module("moduleName", []);

    // Find the token value from the page using jQuery
    var token = $("meta[name=csrf-token]").attr("content");
    
    // Set the token as an Angular constant
    app.constant("CSRF_TOKEN", token);
    
    // Configure $http to include both your token and a flag indicating the request is AJAX
    app.config(["$httpProvider", "CSRF_TOKEN", function($httpProvider, CSRF_TOKEN) {
        $httpProvider.defaults.headers.common["X-Csrf-Token"] = CSRF_TOKEN;
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    }]);
})();