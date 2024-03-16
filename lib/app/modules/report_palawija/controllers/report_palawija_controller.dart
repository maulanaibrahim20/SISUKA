import 'package:get/get.dart';

class ReportPalawijaController extends GetxController {
  final List<SaleItem> sales = [
    SaleItem(productName: 'Product A', price: 20.0),
    SaleItem(productName: 'Product B', price: 30.0),
    SaleItem(productName: 'Product C', price: 25.0),
    SaleItem(productName: 'Product D', price: 35.0),
    SaleItem(productName: 'Product E', price: 40.0),
    SaleItem(productName: 'Product F', price: 45.0),
    SaleItem(productName: 'Product G', price: 50.0),
    SaleItem(productName: 'Product H', price: 55.0),
    SaleItem(productName: 'Product I', price: 60.0),
    SaleItem(productName: 'Product J', price: 65.0),
  ];
}

class SaleItem {
  final String productName;
  final double price;

  SaleItem({required this.productName, required this.price});
}
