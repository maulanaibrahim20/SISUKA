import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:project_sintren/app/constant/constant.dart';
import 'package:project_sintren/app/modules/report_padi/views/report_padi_view.dart';
import 'package:project_sintren/app/modules/report_palawija/views/report_palawija_view.dart';

import '../../report_padi/controllers/report_padi_controller.dart';
import '../controllers/landing_controller.dart';

class ReportsView extends StatefulWidget {
  const ReportsView({super.key});

  @override
  State<ReportsView> createState() => _ReportsViewState();
}

class _ReportsViewState extends State<ReportsView>
    with SingleTickerProviderStateMixin {
  late TabController _tabController;
  final LandingController landingC =
      Get.put(LandingController(), permanent: false);
  final ReportPadiController padiC =
      Get.put(ReportPadiController(), permanent: false);
  final Constant cons = Constant();

  @override
  void initState() {
    super.initState();
    _tabController = TabController(length: landingC.tabs.length, vsync: this);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(
          'Laporan Terkirim',
          style: cons.style2,
        ),
        actions: [
          IconButton(
            icon: Icon(
              Icons.search,
              color: cons.secondaryColor,
            ),
            onPressed: () {
              padiC.openSearch();
            },
          )
        ],
        backgroundColor: cons.primaryColor, // Warna latar belakang AppBar
      ),
      body: Container(
        color: Colors.white, // Warna latar belakang body
        child: Column(
          children: [
            Container(
              color: Colors.white, // Warna latar belakang TabBar
              child: TabBar(
                controller: _tabController,
                tabs: landingC.tabs,
                labelColor: cons.primaryColor,
                labelStyle: cons.style1.copyWith(fontSize: 16),
                unselectedLabelColor: Colors.grey,
                indicatorColor: cons.primaryColor,
                indicatorWeight: 2.0,
                indicatorSize: TabBarIndicatorSize.tab,
              ),
            ),
            Expanded(
              child: TabBarView(
                controller: _tabController,
                children: const [
                  ReportPadiView(tabStatus: 2),
                  ReportPalawijaView(tabStatus: 2),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }

  @override
  void dispose() {
    _tabController.dispose();
    super.dispose();
  }
}
