import 'package:flutter/material.dart';

import 'package:get/get.dart';

import '../../../constant/constant.dart';
import '../../account/views/account_view.dart';
import '../../home/views/home_view.dart';
import '../controllers/landing_controller.dart';
import 'drafts_view.dart';
import 'reports_view.dart';

class LandingView extends GetView<LandingController> {
  const LandingView({super.key});

  @override
  Widget build(BuildContext context) {
    final LandingController landingC =
        Get.put(LandingController(), permanent: false);
    return Scaffold(
      bottomNavigationBar: buildBottomNavigationMenu(context, landingC),
      body: Obx(
        () => IndexedStack(
          index: landingC.tabIndex.value,
          children: const [
            HomeView(),
            DraftsView(),
            ReportsView(),
            AccountView(),
          ],
        ),
      ),
    );
  }

  buildBottomNavigationMenu(context, landingController) {
    Constant cons = Constant();
    return Obx(
      () => MediaQuery(
        data: MediaQuery.of(context)
            .copyWith(textScaler: const TextScaler.linear(1.0)),
        child: BottomNavigationBar(
          showUnselectedLabels: true,
          showSelectedLabels: true,
          elevation: 2,
          onTap: landingController.changeTabIndex,
          currentIndex: landingController.tabIndex.value,
          backgroundColor: cons.primaryColor,
          unselectedItemColor: Colors.white.withOpacity(0.5),
          selectedItemColor: cons.secondaryColor,
          unselectedLabelStyle: TextStyle(
            color: cons.secondaryColor.withOpacity(0.5),
            fontWeight: FontWeight.w500,
            fontSize: 12,
          ),
          selectedLabelStyle: TextStyle(
            color: cons.secondaryColor,
            fontWeight: FontWeight.w500,
            fontSize: 12,
          ),
          items: [
            BottomNavigationBarItem(
              icon: const Icon(
                Icons.home,
                size: 30.0,
              ),
              label: 'Beranda',
              backgroundColor: Colors.green[900],
            ),
            BottomNavigationBarItem(
              icon: const Icon(
                Icons.drafts,
                size: 30.0,
              ),
              label: 'Draf',
              backgroundColor: Colors.green[900],
            ),
            BottomNavigationBarItem(
              icon: const Icon(
                Icons.note,
                size: 30.0,
              ),
              label: 'Laporan',
              backgroundColor: Colors.green[900],
            ),
            BottomNavigationBarItem(
              icon: const Icon(
                Icons.account_circle,
                size: 30.0,
              ),
              label: 'Profile',
              backgroundColor: Colors.green[900],
            ),
          ],
        ),
      ),
    );
  }
}
