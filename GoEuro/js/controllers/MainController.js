app.controller('MainController',
['$scope', function ($scope) {
    $scope.title = 'Top Sellers of Books in the whole wide world..Hello World';
    $scope.promo = 'Hejsan';
    $scope.products =
     [
      {
          name: 'Eiffel Tower',
          city: 'Paris',
          price: '+',
          categ: 'Landmark',
          cover: 'images/paris.jpg',
      },
      {
          name: 'The London Eye',
          city: 'London',
          price: '+',
          categ: 'Landmark',
          cover: 'images/london.jpg',
      },
      {
          name: 'Alte Nationalgalerie',
          city: 'Berlin',
          price: '+',
          categ: 'Museum',
          cover: 'images/nationalgalerie.jpg',
      },
      {
          name: 'The Westminster Palace',
          city: 'London',
          price: '+',
          categ: 'Architeture',
          cover: 'images/palace_westminster.jpg',
      },
      {
          name: 'Brandenburg Gate',
          city: 'Berlin',
          price: '+',
          categ: 'Landmark',
          cover: 'images/berlin.jpg',
      },
      {
          name: 'Parc des Buttes-Chaumont',
          city: 'Paris',
          price: '+',
          categ: 'Parks and Recreation',
          cover: 'images/parc_des_chaumont.jpg',
      },
      {
          name: 'Buckingham palace',
          city: 'London',
          price: '+',
          categ: 'Architecture',
          cover: 'images/buckingham_palace.jpg',
      },
      {
          name: 'Manchester Museum',
          city: 'Manchester',
          price: '+',
          categ: 'Museum',
          cover: 'images/manchester_museum.jpg',
      },
      {
          name: 'Big Ben',
          city: 'London',
          price: '+',
          categ: 'Landmark',
          cover: 'images/big_ben.jpg',
      },
      
      
     ];
    $scope.plusOne = function (index) {
        $scope.products[index].likes += 1;
    };
    $scope.minusOne = function (index) {
        $scope.products[index].dislikes += 1;
    };
    $scope.author = 'Srikar Reddy';
}]);