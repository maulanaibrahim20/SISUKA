import 'package:flutter/material.dart';

import 'package:get/get.dart';
import 'package:syncfusion_flutter_charts/charts.dart';

import '../../../constant/constant.dart';
import '../../report_padi/views/create_report_view.dart';
import '../../report_palawija/views/create_palawija_view.dart';
import '../controllers/home_controller.dart';
import '../models/sales.dart';

class HomeView extends GetView<HomeController> {
  const HomeView({super.key});

  @override
  Widget build(BuildContext context) {
    Constant cons = Constant();
    final HomeController homeC = Get.put(HomeController(), permanent: false);
    return Scaffold(
      backgroundColor: cons.primaryColor,
      body: Stack(
        children: [
          Column(
            children: [
              Container(
                height: 370,
              ),
              Expanded(
                child: Container(
                  width: Get.width,
                  decoration: BoxDecoration(
                    color: cons.secondaryColor,
                    borderRadius: const BorderRadius.only(
                      topLeft: Radius.circular(30),
                      topRight: Radius.circular(30),
                    ),
                  ),
                ),
              ),
            ],
          ),
          Column(
            children: [
              SizedBox(
                height: 380,
                child: Column(
                  children: [
                    Padding(
                      padding: const EdgeInsets.fromLTRB(20, 40, 20, 0),
                      child: Row(
                        children: [
                          Icon(
                            Icons.line_axis,
                            color: cons.secondaryColor,
                            size: 30,
                          ),
                          const SizedBox(
                            width: 10,
                          ),
                          Text(
                            "Trend Pertanian",
                            style: cons.style2.copyWith(fontSize: 24),
                          ),
                        ],
                      ),
                    ),
                    const SizedBox(
                      height: 10,
                    ),
                    SizedBox(
                      height: 290,
                      child: SfCartesianChart(
                        primaryXAxis: CategoryAxis(
                          majorGridLines: const MajorGridLines(width: 0),
                          majorTickLines:
                              const MajorTickLines(color: Colors.white),
                          labelStyle: TextStyle(
                              color: cons.secondaryColor, fontSize: 12),
                        ),
                        primaryYAxis: NumericAxis(
                          majorTickLines:
                              const MajorTickLines(color: Colors.white),
                          majorGridLines: const MajorGridLines(
                            dashArray: [10, 5],
                          ),
                          labelStyle: TextStyle(
                              color: cons.secondaryColor, fontSize: 12),
                        ),
                        series: <CartesianSeries>[
                          SplineAreaSeries<SalesData, String>(
                            borderColor: const Color.fromARGB(255, 1, 142, 10),
                            borderWidth: 3,
                            gradient: LinearGradient(
                              begin: Alignment.topCenter,
                              end: Alignment.bottomCenter,
                              colors: <Color>[
                                Colors.greenAccent.withOpacity(0.5),
                                Colors.lightGreenAccent.withOpacity(0.1),
                              ],
                            ),
                            dataSource: <SalesData>[
                              SalesData('Jan', 35),
                              SalesData('Feb', 28),
                              SalesData('Mar', 34),
                              SalesData('Apr', 32),
                              SalesData('May', 40)
                            ],
                            xValueMapper: (SalesData sales, _) => sales.month,
                            yValueMapper: (SalesData sales, _) => sales.sales,
                            dataLabelSettings: const DataLabelSettings(
                              isVisible: true,
                              color: Colors.black,
                            ),
                          )
                        ],
                        trackballBehavior: TrackballBehavior(
                          enable: true,
                          lineColor: Colors.red,
                          tooltipSettings: const InteractiveTooltip(
                            enable: true,
                          ),
                        ),
                      ),
                    ),
                  ],
                ),
              ),
              SizedBox(
                height: 190,
                child: Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 20),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Card(
                        surfaceTintColor: cons.secondaryColor,
                        child: Container(
                          padding: const EdgeInsets.symmetric(horizontal: 20),
                          height: 50,
                          width: Get.width,
                          child: const Row(
                            mainAxisAlignment: MainAxisAlignment.spaceBetween,
                            children: [
                              Text(
                                "Countdown Panen :",
                                style: TextStyle(
                                  fontSize: 16,
                                  fontWeight: FontWeight.bold,
                                ),
                              ),
                              Text(
                                "2 Bulan 2 Hari",
                                style: TextStyle(
                                  color: Colors.red,
                                  fontSize: 16,
                                  fontWeight: FontWeight.bold,
                                ),
                              ),
                            ],
                          ),
                        ),
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: [
                          ElevatedButton(
                            onPressed: () {
                              Get.to(() => CreateReportView());
                            },
                            style: ElevatedButton.styleFrom(
                                fixedSize: Size(Get.width * 0.43, 50),
                                elevation: 3,
                                backgroundColor: cons.primaryColor,
                                shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.circular(10),
                                )),
                            child: Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Icon(
                                  Icons.add,
                                  color: cons.secondaryColor,
                                ),
                                Text(
                                  "Padi",
                                  style: cons.style2.copyWith(fontSize: 18),
                                ),
                              ],
                            ),
                          ),
                          const SizedBox(
                            width: 10,
                          ),
                          ElevatedButton(
                            onPressed: () => Get.to(() => const CreatePalawijaView()),
                            style: ElevatedButton.styleFrom(
                                fixedSize: Size(Get.width * 0.43, 50),
                                elevation: 3,
                                backgroundColor: cons.primaryColor,
                                shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.circular(10),
                                )),
                            child: Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Icon(
                                  Icons.add,
                                  color: cons.secondaryColor,
                                ),
                                Text(
                                  "Palawija",
                                  style: cons.style2.copyWith(fontSize: 18),
                                ),
                              ],
                            ),
                          ),
                        ],
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                      const Divider(
                        color: Colors.grey,
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                      const Text(
                        "Terakhir Diupload",
                        style: TextStyle(
                          fontSize: 18,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                    ],
                  ),
                ),
              ),
              Expanded(
                child: Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 20),
                  child: SingleChildScrollView(
                    child: Column(
                      children: homeC.report.map((report) {
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
                                    title: Text(
                                      "Laporan: ${report.date}",
                                      style: TextStyle(
                                          color: cons.secondaryColor,
                                          fontWeight: FontWeight.bold),
                                    ),
                                    subtitle: Column(
                                      crossAxisAlignment:
                                          CrossAxisAlignment.start,
                                      children: [
                                        Text(
                                          "Desa: ${report.desa}",
                                          style: TextStyle(
                                              color: cons.secondaryColor),
                                        ),
                                        Row(
                                          mainAxisAlignment:
                                              MainAxisAlignment.spaceBetween,
                                          children: [
                                            Text(
                                              report.jenisLahan,
                                              style: TextStyle(
                                                  color: cons.secondaryColor),
                                            ),
                                            RichText(
                                              text: TextSpan(
                                                  text: "Status: ",
                                                  style: TextStyle(
                                                    color: cons.secondaryColor,
                                                  ),
                                                  children: [
                                                    TextSpan(
                                                      text: report.status,
                                                      style: cons.style2,
                                                    )
                                                  ]),
                                            ),
                                          ],
                                        ),
                                      ],
                                    ),
                                    onTap: () {
                                      // Action when tapped
                                    },
                                  ),
                                ),
                              ],
                            ),
                          ),
                        );
                      }).toList(),
                    ),
                  ),
                ),
              ),
            ],
          )
        ],
      ),
    );
  }
}
