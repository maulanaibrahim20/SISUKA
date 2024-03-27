import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../models/report_padi.dart';

class ReportPadiController extends GetxController {
  TextEditingController textC = TextEditingController();

  // TabBar
  var tabIndex = 0.obs;
  void changeTabIndex(int index) {
    tabIndex.value = index;
  }

  final List<Tab> tabs = [
    const Tab(text: 'Padi'),
    const Tab(text: 'Pengairan'),
  ];

  // Searching
  var isSearchOpen = false.obs;
  var searchText = ''.obs;
  void openSearch() {
    isSearchOpen.value = true;
  }

  void closeSearch() {
    isSearchOpen.value = false;
    searchText.value = '';
    textC.clear();
  }

  void updateSearchText(String text) {
    searchText.value = text;
  }

  final List<ReportPadi> report = [
    ReportPadi(
      id: 1,
      desa: "Kalijaga",
      date: "2 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Sawah",
      status: "Draft",
    ),
    ReportPadi(
      id: 2,
      desa: "Harjamukti",
      date: "3 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Non Sawah",
      status: "Draft",
    ),
    ReportPadi(
      id: 3,
      desa: "Karya Mulya",
      date: "4 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Sawah",
      status: "Terkirim",
    ),
    ReportPadi(
      id: 4,
      desa: "Kalijaga",
      date: "5 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Non Sawah",
      status: "Terkirim",
    ),
    ReportPadi(
      id: 5,
      desa: "Argasunya",
      date: "6 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Sawah",
      status: "Draft",
    ),
    ReportPadi(
      id: 6,
      desa: "Argasunya",
      date: "2 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Non Sawah",
      status: "Terkirim",
    ),
    ReportPadi(
      id: 7,
      desa: "Kalijaga",
      date: "2 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Sawah",
      status: "Terkirim",
    ),
  ];

  var selectedDesa = ''.obs;
  List<String> desa = [
    "Kalijaga",
    "Argasunya",
    "Argapura",
    "Harjamukti",
  ].obs;

  var selectedLahan = ''.obs;
  List<String> lahan = ["Lahan Sawah", "Lahan Non-Sawah"].obs;

  var selectedIrigasi = ''.obs;
  List<String> irigasi = ["Tidak Ada", "Ada"].obs;
}
