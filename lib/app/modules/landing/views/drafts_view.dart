import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:project_sintren/app/constant/constant.dart';
import 'package:project_sintren/app/modules/report_padi/views/report_padi_view.dart';
import 'package:project_sintren/app/modules/report_palawija/views/report_palawija_view.dart';

import '../controllers/landing_controller.dart';

class DraftsView extends StatefulWidget {
  const DraftsView({super.key});

  @override
  State<DraftsView> createState() => _DraftsViewState();
}

class _DraftsViewState extends State<DraftsView>
    with SingleTickerProviderStateMixin {
  late TabController _tabController;
  final LandingController landingC =
      Get.put(LandingController(), permanent: false);
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
          'Draft Laporan',
          style: cons.style2,
        ),
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
                  ReportPadiView(),
                  ReportPalawijaView(),
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
