import 'package:flutter/material.dart';
import 'package:get/get.dart';

class LandingController extends GetxController {
  var tabIndex = 0.obs;
  
   void changeTabIndex(int index) {
    tabIndex.value = index;
  }

  final List<Tab> tabs = [
    const Tab(text: 'Padi'),
    const Tab(text: 'Palawija'),
  ];
}
