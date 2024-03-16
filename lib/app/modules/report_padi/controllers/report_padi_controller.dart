import 'package:get/get.dart';

import '../models/report_padi.dart';

class ReportPadiController extends GetxController {
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
  List<Desa> desa = [
    Desa(id: "1", nama: "Kalijaga"),
    Desa(id: "2", nama: "Argasunya"),
    Desa(id: "3", nama: "Argapura"),
    Desa(id: "4", nama: "Harjamukti"),
  ].obs;

  var selectedLahan = ''.obs;
  List<String> lahan = ["Lahan Sawah", "Lahan Non-Sawah"].obs;

  var selectedIrigasi = ''.obs;
  List<String> irigasi = ["Tidak Ada", "Ada"].obs;
}

class Desa {
  final String id;
  final String nama;

  Desa({required this.id, required this.nama});
}
