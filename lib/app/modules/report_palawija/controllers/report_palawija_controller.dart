import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../models/jenis_palawija.dart';
import '../models/report_detail_palawija.dart';
import '../models/report_palawija.dart';

class ReportPalawijaController extends GetxController {
  TextEditingController textC = TextEditingController();
  TextEditingController tanamanAkhirBulanLaluC = TextEditingController();
  TextEditingController tanamanAkhirBulanIniC = TextEditingController();
  TextEditingController panenC = TextEditingController();
  TextEditingController panenMudaC = TextEditingController();
  TextEditingController panenTernakC = TextEditingController();
  TextEditingController pusoC = TextEditingController();
  TextEditingController tanamC = TextEditingController();
  TextEditingController produksiC = TextEditingController();

  // Count Total
  var totalTanamanAkhirBulanLalu = 0.obs;
  var totalTanamanAkhirBulanIni = 0.obs;
  var totalPanen = 0.obs;
  var totalTanam = 0.obs;
  var totalPuso = 0.obs;
  var totalPanenMuda = 0.obs;
  var totalPanenTernak = 0.obs;
  var totalProduksi = 0.obs;
  void countTotal() {
    for (var padi in detailPalawija) {
      totalTanamanAkhirBulanLalu.value =
          totalTanamanAkhirBulanLalu.value + padi.tanamanAkhirBulanLalu;
      totalPanen.value = totalPanen.value + padi.panen;
      totalTanam.value = totalTanam.value + padi.tanam;
      totalPuso.value = totalPuso.value + padi.puso;
      totalPanenMuda.value = totalPanenMuda.value + padi.panenMuda;
      totalPanenTernak.value = totalPanenTernak.value + padi.panenTernak;
      totalProduksi.value = totalProduksi.value + padi.produksi;
      totalTanamanAkhirBulanIni.value = (totalTanamanAkhirBulanLalu.value -
          totalPanen.value -
          totalPanenMuda.value -
          totalPanenTernak.value +
          totalTanam.value -
          totalPuso.value);
    }
  }

  var totalBulanIni = 0.obs;
  void countTotalBulanIni() {
    int tanamanAkhirBulanLalu = int.tryParse(tanamanAkhirBulanLaluC.text) ?? 0;
    int panen = int.tryParse(panenC.text) ?? 0;
    int tanam = int.tryParse(tanamC.text) ?? 0;
    int puso = int.tryParse(pusoC.text) ?? 0;
    int panenMuda = int.tryParse(panenMudaC.text) ?? 0;
    int panenTernak = int.tryParse(panenTernakC.text) ?? 0;

    totalBulanIni.value = (tanamanAkhirBulanLalu -
        panen -
        panenMuda -
        panenTernak +
        tanam -
        puso);
    tanamanAkhirBulanIniC.text = totalBulanIni.value.toString();
  }

  final detailPalawija = List<ReportDetailPalawija>.empty(growable: true).obs;
  void addDetailPalawija() {
    int id = 1;
    id = detailPalawija.isEmpty ? 1 : (id + detailPalawija.length);
    final jenisPalawija = selectedJenisPalawija.value!.nama;
    final bantuan = selectedBantuan.value == "Ya" ? true : false;
    final tanamanAkhirBulanLalu = tanamanAkhirBulanLaluC.text != ""
        ? int.parse(tanamanAkhirBulanLaluC.text)
        : 0;
    final panen = panenC.text != "" ? int.parse(panenC.text) : 0;
    final panenMuda = panenMudaC.text != "" ? int.parse(panenMudaC.text) : 0;
    final panenTernak =
        panenTernakC.text != "" ? int.parse(panenTernakC.text) : 0;
    final produksi = produksiC.text != "" ? int.parse(produksiC.text) : 0;
    final tanam = tanamC.text != "" ? int.parse(tanamC.text) : 0;
    final pusoRusak = pusoC.text != "" ? int.parse(pusoC.text) : 0;
    final tanamanAkhirBulanIni = tanamanAkhirBulanIniC.text != ""
        ? int.parse(tanamanAkhirBulanIniC.text)
        : 0;

    detailPalawija.add(
      ReportDetailPalawija(
        id,
        jenisPalawija,
        bantuan,
        tanamanAkhirBulanLalu,
        tanamanAkhirBulanIni,
        tanam,
        panen,
        panenMuda,
        panenTernak,
        pusoRusak,
        produksi,
      ),
    );

    selectedJenisPalawija = Rx<JenisPalawija?>(null);
    selectedBantuan.value = "";
    tanamanAkhirBulanIniC.clear();
    tanamanAkhirBulanLaluC.clear();
    tanamC.clear();
    panenC.clear();
    pusoC.clear();
    panenMudaC.clear();
    panenTernakC.clear();
    produksiC.clear();
  }

  var selectedJenisPalawija = Rx<JenisPalawija?>(null);
  List<JenisPalawija> jenisPalawija = [
    JenisPalawija("1", "Jagung Hibrida", true, true, true, false),
    JenisPalawija("2", "Jagung Hibrida", true, true, false, false),
    JenisPalawija("3", "Jagung Lokal", true, true, false, false),
    JenisPalawija("4", "Kedelai", true, false, true, false),
    JenisPalawija("5", "Kacang Tanah", false, false, false, false),
    JenisPalawija("6", "Ubi Kayu Singkong", false, false, true, false),
    JenisPalawija("7", "ubi Jalar/Ketela Rambat", false, false, false, false),
    JenisPalawija("8", "Kacang Hijau", false, false, false, true),
    JenisPalawija("9", "Sorgum/Cantel", false, false, false, true),
    JenisPalawija("10", "Gandum", false, false, false, true),
    JenisPalawija("11", "Talas", false, false, false, true),
    JenisPalawija("12", "Ganyong", false, false, false, true),
    JenisPalawija("13", "Umbi lainnnya", false, false, false, false),
  ].obs;

  var isPanenMuda = false.obs;
  var isPanenTernak = false.obs;
  var isProduksi = false.obs;
  var isBantuan = false.obs;
  void onChangeJenisPalawija(JenisPalawija value) {
    selectedJenisPalawija.value = value;
    isPanenMuda.value = value.panenMuda;
    isPanenTernak.value = value.panenTernak;
    isProduksi.value = value.produksi;
    isBantuan.value = value.bantuan;
  }

  var selectedBantuan = ''.obs;
  List<String> bantuan = ["Ya", "Tidak"].obs;

  var selectedDesa = ''.obs;
  List<String> desa = [
    "Kalijaga",
    "Argasunya",
    "Argapura",
    "Harjamukti",
  ].obs;

  var selectedLahan = ''.obs;
  List<String> lahan = ["Lahan Sawah", "Lahan Non-Sawah"].obs;

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

  final List<ReportPalawija> report = [
    ReportPalawija(
      id: 1,
      desa: "Kalijaga",
      date: "2 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Sawah",
      status: "Draft",
    ),
    ReportPalawija(
      id: 2,
      desa: "Harjamukti",
      date: "3 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Non Sawah",
      status: "Draft",
    ),
    ReportPalawija(
      id: 3,
      desa: "Karya Mulya",
      date: "4 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Sawah",
      status: "Terkirim",
    ),
    ReportPalawija(
      id: 4,
      desa: "Kalijaga",
      date: "5 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Non Sawah",
      status: "Terkirim",
    ),
    ReportPalawija(
      id: 5,
      desa: "Argasunya",
      date: "6 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Sawah",
      status: "Draft",
    ),
    ReportPalawija(
      id: 6,
      desa: "Argasunya",
      date: "2 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Non Sawah",
      status: "Terkirim",
    ),
    ReportPalawija(
      id: 7,
      desa: "Kalijaga",
      date: "2 Februari 2024",
      penyuluh: "Gusti",
      jenisLahan: "Lahan Sawah",
      status: "Terkirim",
    ),
  ];
}
