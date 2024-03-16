import 'package:get/get.dart';

import '../models/report.dart';

class HomeController extends GetxController {
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
}
