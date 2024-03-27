import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../../../constant/constant.dart';
import '../controllers/report_palawija_controller.dart';

class ReportPalawijaView extends GetView<ReportPalawijaController> {
  const ReportPalawijaView({super.key, this.tabStatus = 1});

  final int tabStatus;

  @override
  Widget build(BuildContext context) {
    Constant cons = Constant();

    return Obx(() {
      final filteredPalawijaReports = controller.report.where((report) {
        final searchText = controller.searchText.value.toLowerCase();
        final tanggalLaporan = report.date.toLowerCase();
        final wilayah = report.desa.toLowerCase();
        return tanggalLaporan.contains(searchText) ||
            wilayah.contains(searchText);
      }).toList();

      return Column(
        children: [
          controller.isSearchOpen.value
              ? Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: TextField(
                    controller: controller.textC,
                    onChanged: controller.updateSearchText,
                    decoration: InputDecoration(
                      border: const OutlineInputBorder(),
                      labelText: 'Cari laporan palawija ...',
                      prefixIcon: Icon(
                        Icons.search,
                        color: cons.primaryColor,
                      ),
                      suffixIcon: IconButton(
                        icon: const Icon(
                          Icons.clear,
                          color: Colors.red,
                        ),
                        onPressed: () {
                          controller.closeSearch();
                        },
                      ),
                    ),
                  ),
                )
              : const SizedBox.shrink(),
          Expanded(
            child: ListView.builder(
              itemCount: filteredPalawijaReports.length,
              itemBuilder: (context, index) {
                final report = filteredPalawijaReports[index];
                return Card(
                  elevation: 4.0,
                  margin: const EdgeInsets.all(8.0),
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(10.0),
                  ),
                  child: Container(
                    decoration: BoxDecoration(
                      borderRadius: BorderRadius.circular(10.0),
                      color: cons.primaryColor,
                    ),
                    child: Row(
                      children: [
                        Expanded(
                          child: ListTile(
                            leading: Icon(
                              Icons.notes,
                              color: cons.secondaryColor,
                            ),
                            title: Text("Laporan: ${report.date}",
                                style: cons.style2),
                            subtitle: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                Text(
                                  "Desa: ${report.desa}",
                                  style: TextStyle(color: cons.secondaryColor),
                                ),
                                Text(
                                  report.jenisLahan,
                                  style: TextStyle(color: cons.secondaryColor),
                                ),
                              ],
                            ),
                            onTap: () {
                              // Action when tapped
                            },
                          ),
                        ),
                        if (tabStatus == 1) ...[
                          IconButton(
                            onPressed: () {},
                            icon: Icon(
                              Icons.edit_document,
                              size: 25,
                              color: cons.secondaryColor,
                            ),
                          ),
                          IconButton(
                            onPressed: () {},
                            icon: Icon(
                              Icons.delete,
                              size: 25,
                              color: cons.secondaryColor,
                            ),
                          ),
                        ],
                        const SizedBox(width: 10),
                      ],
                    ),
                  ),
                );
              },
            ),
          ),
        ],
      );
    });
  }
}
