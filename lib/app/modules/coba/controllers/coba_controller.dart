import 'package:flutter/material.dart';
import 'package:get/get.dart';

class CobaController extends GetxController {
  final TextEditingController nameController = TextEditingController();
  final TextEditingController ageController = TextEditingController();
  final dataList = List<Data>.empty(growable: true).obs;

  void addData() {
    String name = nameController.text;
    int age = int.tryParse(ageController.text) ?? 0;
    Data newData = Data(name, age);
    dataList.add(newData);
    nameController.clear();
    ageController.clear();
  }
}

class Data {
  String name;
  int age;

  Data(this.name, this.age);
}
