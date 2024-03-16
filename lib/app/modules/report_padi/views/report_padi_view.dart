import 'package:flutter/material.dart';

import 'package:get/get.dart';

import '../../../constant/constant.dart';
import '../controllers/report_padi_controller.dart';

class ReportPadiView extends GetView<ReportPadiController> {
  const ReportPadiView({super.key, this.tabStatus = 1});

  final int tabStatus;

  @override
  Widget build(BuildContext context) {
    final Constant cons = Constant();

    final ReportPadiController reportC =
        Get.put(ReportPadiController(), permanent: false);

    return Scaffold(
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(8.0),
          child: Column(
            children: reportC.report.map((report) {
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
                      if (tabStatus == 1)
                        IconButton(
                          onPressed: () {},
                          icon: Icon(
                            Icons.edit_document,
                            size: 25,
                            color: cons.secondaryColor,
                          ),
                        ),
                      if (tabStatus == 1)
                        IconButton(
                          onPressed: () {},
                          icon: Icon(
                            Icons.delete,
                            size: 25,
                            color: cons.secondaryColor,
                          ),
                        ),
                      const SizedBox(width: 10),
                    ],
                  ),
                ),
              );
            }).toList(),
          ),
        ),
      ),
    );
  }
}
