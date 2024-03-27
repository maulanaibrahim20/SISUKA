import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:project_sintren/app/modules/report_padi/controllers/report_padi_controller.dart';
import 'package:project_sintren/app/modules/report_padi/views/create_padi_view.dart';
import 'package:project_sintren/app/modules/report_padi/views/create_pengairan_view.dart';

import '../../../constant/constant.dart';

class ReportLandingView extends StatefulWidget {
  const ReportLandingView({super.key});

  @override
  State<ReportLandingView> createState() => _ReportLandingViewState();
}

class _ReportLandingViewState extends State<ReportLandingView>
    with SingleTickerProviderStateMixin {
  late TabController _tabController;
  final ReportPadiController landingC =
      Get.put(ReportPadiController(), permanent: false);
  Constant cons = Constant();

  @override
  void initState() {
    super.initState();
    _tabController = TabController(length: landingC.tabs.length, vsync: this);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      resizeToAvoidBottomInset: false,
      appBar: AppBar(
        automaticallyImplyLeading: false,
        backgroundColor: cons.primaryColor,
        leading: IconButton(
          icon: Icon(
            Icons.arrow_back,
            color: cons.secondaryColor,
          ),
          onPressed: () => Get.back(),
        ),
        title: Text(
          "Tambah Data",
          style: TextStyle(
            fontWeight: FontWeight.bold,
            color: cons.secondaryColor,
          ),
        ),
        actions: [
          IconButton(
            onPressed: () {},
            icon: Icon(
              Icons.send_rounded,
              color: cons.secondaryColor,
            ),
          ),
        ],
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
                children: const [CreatePadiView(), CreatePengairanView()],
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
