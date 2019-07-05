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
    public partial class LoginInformationForm : Form
    {
        public LoginInformationForm()
        {
            InitializeComponent();

            rtbMessage.AppendText("Logged in successfully!");
        }

        private void btnOK_Click(object sender, EventArgs e)
        {
            MainMenuForm frm = new MainMenuForm();
            frm.Show();
            this.Hide();
        }

        private void rtbMessage_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter)
            {
                MainMenuForm frm = new MainMenuForm();
                frm.Show();
                this.Hide();
            }
        }
    }
}
