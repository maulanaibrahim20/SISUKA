import 'package:flutter/material.dart';
import 'package:get/get.dart';

import '../../../constant/constant.dart';
import '../controllers/report_palawija_controller.dart';

class ReportPalawijaView extends GetView<ReportPalawijaController> {
  const ReportPalawijaView({super.key, this.tabStatus = 1});

  final int tabStatus;

  @override
  Widget build(BuildContext context) {
    final Constant cons = Constant();

    final ReportPalawijaController reportC =
        Get.put(ReportPalawijaController(), permanent: false);

    return Scaffold(
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(8.0),
          child: Column(
            children: reportC.sales.map((sale) {
              return Card(
                elevation: 4.0,
                margin: const EdgeInsets.all(8.0),
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(10.0),
                ),
                child: Container(
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(10.0),
                    color: cons.primaryColor
                  ),
                  child: Row(
                    children: [
                      Expanded(
                        child: ListTile(
                          title: Text(
                            tabStatus.toString(),
                            style: TextStyle(color: cons.secondaryColor),
                          ),
                          subtitle: Text(
                            '\$${sale.price.toStringAsFixed(2)}',
                            style: TextStyle(color: cons.secondaryColor),
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
