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
    public partial class MainMenuForm : Form
    {
        static GYM_database gymDatabaseContext = new GYM_database();

        public MainMenuForm()
        {
            InitializeComponent();
            lblLoggedWorker.Text = "Currently logged as: " + LoginForm.loggedWorker.firstName + " " + LoginForm.loggedWorker.lastName;
        }

        private void exitToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            this.Hide();
            LoginForm frm = new LoginForm();
            frm.Show();
        }

        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            var bosses = from b in gymDatabaseContext.Bosses select b;

            foreach(Bosses b in bosses)
            {
                MessageBox.Show("Owned by: " + b.bossName + " " + b.bossLastName);
            }
        }

        private void btnLogOut_Click(object sender, EventArgs e)
        {
            this.Hide();
            LoginForm frm = new LoginForm();
            frm.Show();
        }

        private void btnMembers_Click(object sender, EventArgs e)
        {
            MembersForm frm = new MembersForm();
            frm.Show();
        }

        private void btnEmployees_Click(object sender, EventArgs e)
        {
            EmployeesForm frm = new EmployeesForm();
            frm.Show();
        }

        private void btnSubscriptions_Click(object sender, EventArgs e)
        {
            SubscriptionsForm frm = new SubscriptionsForm();
            frm.Show();
        }
    }
}
