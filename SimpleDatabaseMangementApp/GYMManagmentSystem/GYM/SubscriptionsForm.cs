using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace GYM
{
    public partial class SubscriptionsForm : Form
    {
        public SubscriptionsForm()
        {
            InitializeComponent();

            GYM_database gymDatabaseContext = new GYM_database();

            int sub1total = 0;
            double sub1price = 0;

            var info1 = from i1 in gymDatabaseContext.Members where i1.subId == 1 select i1;
            foreach(Members i1 in info1)
            {
                sub1total++;
                sub1price = sub1total * i1.Subscriptions.price;
            }

            int sub2total = 0;
            double sub2price = 0;

            var info2 = from i2 in gymDatabaseContext.Members where i2.subId == 2 select i2;
            foreach (Members i2 in info2)
            {
                sub2total++;
                sub2price = sub2total * i2.Subscriptions.price;
            }

            int sub3total = 0;
            double sub3price = 0;

            var info3 = from i3 in gymDatabaseContext.Members where i3.subId == 3 select i3;
            foreach (Members i3 in info3)
            {
                sub3total++;
                sub3price = sub3total * i3.Subscriptions.price;
            }

            int sub4total = 0;
            double sub4price = 0;

            var info4 = from i4 in gymDatabaseContext.Members where i4.subId == 4 select i4;
            foreach (Members i4 in info4)
            {
                sub4total++;
                sub4price = sub4total * i4.Subscriptions.price;
            }

            int sub5total = 0;
            double sub5price = 0;

            var info5 = from i5 in gymDatabaseContext.Members where i5.subId == 5 select i5;
            foreach (Members i5 in info5)
            {
                sub5total++;
                sub5price = sub5total * i5.Subscriptions.price;
            }

            int sub6total = 0;
            double sub6price = 0;

            var info6 = from i6 in gymDatabaseContext.Members where i6.subId == 6 select i6;
            foreach (Members i6 in info6)
            {
                sub6total++;
                sub6price = sub6total * i6.Subscriptions.price;
            }

            int sub7total = 0;
            double sub7price = 0;

            var info7 = from i7 in gymDatabaseContext.Members where i7.subId == 7 select i7;
            foreach (Members i7 in info7)
            {
                sub7total++;
                sub7price = sub7total * i7.Subscriptions.price;
            }

            int sub8total = 0;
            double sub8price = 0;

            var info8 = from i8 in gymDatabaseContext.Members where i8.subId == 8 select i8;
            foreach (Members i8 in info8)
            {
                sub8total++;
                sub8price = sub8total * i8.Subscriptions.price;
            }

            rtbResult.AppendText("3x per week: " + sub1total + " subscriptions making " + sub1price + " per month.\n" +
                                 "4x per week: " + sub2total + " subscriptions making " + sub2price + " per month.\n" +
                                 "5x per week: " + sub3total + " subscriptions making " + sub3price + " per month.\n" +
                                 "6x per week: " + sub4total + " subscriptions making " + sub4price + " per month.\n" +
                                 "Student 3x per week: " + sub5total + " subscriptions making " + sub5price + " per month.\n" +
                                 "Student 4x per week: " + sub6total + " subscriptions making " + sub6price + " per month.\n" +
                                 "Student 5x per week: " + sub7total + " subscriptions making " + sub7price + " per month.\n" +
                                 "Student 6x per week: " + sub8total + " subscriptions making " + sub8price + " per month.\n");
        }
    }
}
