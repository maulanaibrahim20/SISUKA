import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../models/report_detail_padi.dart';

class PadiController extends GetxController {
  TextEditingController textC = TextEditingController();
  TextEditingController tanamanAkhirBulanLaluC = TextEditingController();
  TextEditingController tanamanAkhirBulanIniC = TextEditingController();
  TextEditingController panenC = TextEditingController();
  TextEditingController pusoC = TextEditingController();
  TextEditingController tanamC = TextEditingController();

  // Count Total
  var totalTanamanAkhirBulanLalu = 0.obs;
  var totalTanamanAkhirBulanIni = 0.obs;
  var totalPanen = 0.obs;
  var totalTanam = 0.obs;
  var totalPuso = 0.obs;
  void countTotal() {
    for (var padi in detailPadi) {
      totalTanamanAkhirBulanLalu.value =
          totalTanamanAkhirBulanLalu.value + padi.tanamanAkhirBulanLalu;
      totalPanen.value = totalPanen.value + padi.panen;
      totalTanam.value = totalTanam.value + padi.tanam;
      totalPuso.value = totalPuso.value + padi.puso;
      totalTanamanAkhirBulanIni.value =
          (totalTanamanAkhirBulanLalu.value - totalPanen.value) +
              (totalTanam.value - totalPuso.value);
    }
  }

  var totalBulanIni = 0.obs;
  void countTotalBulanIni() {
    int tanamanAkhirBulanLalu = int.tryParse(tanamanAkhirBulanLaluC.text) ?? 0;
    int panen = int.tryParse(panenC.text) ?? 0;
    int tanam = int.tryParse(tanamC.text) ?? 0;
    int puso = int.tryParse(pusoC.text) ?? 0;

    totalBulanIni.value = (tanamanAkhirBulanLalu - panen) + (tanam - puso);
    tanamanAkhirBulanIniC.text = totalBulanIni.value.toString();
  }

  //  DetailPadi
  final detailPadi = List<ReportDetailPadi>.empty(growable: true).obs;
  void addDetailPadi() {
    int id = 1;
    id = detailPadi.isEmpty ? 1 : (id + detailPadi.length);
    final jenisPadi = selectedJenisPadi.value;
    final bantuan = selectedBantuan.value == "Ya" ? true : false;
    final tanamanAkhirBulanLalu = tanamanAkhirBulanLaluC.text != ""
        ? int.parse(tanamanAkhirBulanLaluC.text)
        : 0;
    final panen = panenC.text != "" ? int.parse(panenC.text) : 0;
    final tanam = tanamC.text != "" ? int.parse(tanamC.text) : 0;
    final pusoRusak = pusoC.text != "" ? int.parse(pusoC.text) : 0;
    final tanamanAkhirBulanIni = tanamanAkhirBulanIniC.text != ""
        ? int.parse(tanamanAkhirBulanIniC.text)
        : 0;

    detailPadi.add(ReportDetailPadi(id, jenisPadi, bantuan,
        tanamanAkhirBulanLalu, tanamanAkhirBulanIni, tanam, panen, pusoRusak));

    selectedJenisPadi.value = "";
    selectedBantuan.value = "";
    tanamanAkhirBulanIniC.clear();
    tanamanAkhirBulanLaluC.clear();
    tanamC.clear();
    panenC.clear();
    pusoC.clear();
  }

  var selectedJenisPadi = ''.obs;
  List<String> jenisPadi = ["Hibrida", "Inhibrida"].obs;

  var selectedBantuan = ''.obs;
  List<String> bantuan = ["Ya", "Tidak"].obs;
}
